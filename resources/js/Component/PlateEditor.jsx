// resources/js/components/PlateEditor.jsx
import React from 'react';
import { Plate, createPlugins, createEditor } from '@udecode/plate';
import { Slate } from 'slate-react';

const PlateEditor = () => {
    const editor = React.useMemo(() => createEditor(), []);
    const plugins = React.useMemo(() => createPlugins(), []);
    
    return (
        <div className="editor">
            <Slate editor={editor} value={[{ type: 'paragraph', children: [{ text: '' }] }]}>
                <Plate plugins={plugins} />
            </Slate>
        </div>
    );
};

export default PlateEditor;
