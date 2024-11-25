import React, { useState } from 'react';
import {
    createPlateEditor,
    createPlugins,
    Plate,
    PlateProvider,
    createPluginFactory,
    createBoldPlugin,
    createItalicPlugin,
    createUnderlinePlugin,
    createParagraphPlugin,
    createHeadingPlugin,
    createToolbarPlugin,
} from '@udecode/plate-common';
import { createBasicElementsPlugin } from '@udecode/plate-basic-elements';
import { createBasicMarksPlugin } from '@udecode/plate-basic-marks';

const plugins = createPlugins([
    createParagraphPlugin(),
    createBasicElementsPlugin(),
    createBasicMarksPlugin(),
    createBoldPlugin(),
    createItalicPlugin(),
    createUnderlinePlugin(),
    createHeadingPlugin(),
    createToolbarPlugin(),
]);

const CreateTodo = () => {
    const [title, setTitle] = useState('');
    const [description, setDescription] = useState([
        {
            type: 'p',
            children: [{ text: '' }],
        },
    ]);

    const editor = createPlateEditor({
        plugins,
    });

    const handleSubmit = (e) => {
        e.preventDefault();

     
        const descriptionHtml = description.map(node => {
            if (node.type === 'p') {
                return `<p>${node.children.map(child => child.text).join('')}</p>`;
            }
            return '';
        }).join('');

        fetch('/api/tasks', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ 
                title, 
                description: descriptionHtml 
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Task created:', data);
            window.location.href = '/tasks';
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };

    return (
        <div className="container mt-5">
            <div className="card">
                <div className="card-header">
                    <h2>Tạo công việc</h2>
                </div>
                <div className="card-body">
                    <form onSubmit={handleSubmit}>
                        <div className="mb-3">
                            <label className="form-label">Title:</label>
                            <input 
                                type="text" 
                                className="form-control"
                                value={title} 
                                onChange={(e) => setTitle(e.target.value)}
                                required 
                            />
                        </div>
                        <div className="mb-3">
                            <label className="form-label">Mô tả :</label>
                            <PlateProvider plugins={plugins}>
                                <Plate
                                    editableProps={{
                                        className: 'form-control plate-editor',
                                        style: {
                                            minHeight: '150px',
                                            padding: '10px'
                                        }
                                    }}
                                    initialValue={description}
                                    onChange={setDescription}
                                >
                                    <div className="plate-toolbar mb-2">
                                        <button type="button" className="btn btn-sm btn-outline-secondary" onMouseDown={(e) => {
                                            e.preventDefault();
                                            editor.toggleMark('bold');
                                        }}>
                                            Bold
                                        </button>
                                        <button type="button" className="btn btn-sm btn-outline-secondary mx-1" onMouseDown={(e) => {
                                            e.preventDefault();
                                            editor.toggleMark('italic');
                                        }}>
                                            Italic
                                        </button>
                                        <button type="button" className="btn btn-sm btn-outline-secondary" onMouseDown={(e) => {
                                            e.preventDefault();
                                            editor.toggleMark('underline');
                                        }}>
                                            Underline
                                        </button>
                                    </div>
                                </Plate>
                            </PlateProvider>
                        </div>
                        <button type="submit" className="btn btn-primary">Tạo công việc</button>
                        <a href="/tasks" className="btn btn-secondary ms-2">hủy bỏ</a>
                    </form>
                </div>
            </div>
        </div>
    );
};

export default CreateTodo;
