import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import CreateTodo from './Component/CreateTodo';
import EditTodo from './Component/EditTodo';
import './bootstrap';
import '../css/plate.css';
import ChartComponent from './Component/ChartComponent';

const App = () => {
    return (
        <Router>
            <Routes>
                <Route path="/tasks/create" element={<CreateTodo />} />
                <Route path="/tasks/edit/:id" element={<EditTodo />} />
                <Route path="/chart" element={<ChartComponent />} />
            </Routes>
        </Router>
    );
};

const root = ReactDOM.createRoot(document.getElementById('app'));
root.render(<App />);

// Mount components
if (document.getElementById('create-todo')) {
    ReactDOM.render(<CreateTodo />, document.getElementById('create-todo'));
}

if (document.getElementById('edit-todo')) {
    ReactDOM.render(<EditTodo />, document.getElementById('edit-todo'));
}
