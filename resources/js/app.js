// import './bootstrap';

import {ReactApp} from './components/ReactApp';

// var1 до react 18

// import ReactDOM from 'react-dom';
//
// const reactApp = document.getElementById('reactApp');
// if (reactApp) {
//     ReactDOM.render(<ReactApp/>, reactApp);
// }

// var2 react 18

import React from 'react';
import ReactDOM from 'react-dom/client';

const reactAppEl = document.getElementById('reactApp');
if (reactAppEl) {
    const root = ReactDOM.createRoot(reactAppEl);
    root.render(
        <React.StrictMode>
            <ReactApp />
        </React.StrictMode>
    );
}

// var3 react 18 hydrate
//
// import { hydrateRoot } from 'react-dom/client';
// const reactContainer = document.getElementById('reactApp');
// if (reactContainer) {
//     const root = hydrateRoot(reactContainer, <ReactApp />);
// }


