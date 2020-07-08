import React from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter as Router, Switch, Link, Route } from 'react-router-dom'

const routes = [
    {
        path: '/',
        exact: true,
        sidebar: () => <div>home</div>,
        main: () => <h2>Home</h2>
    },
    {
        path: '/one',
        sidebar: () => <div>One</div>,
        main: () => <h2>One</h2>
    },
    {
        path: '/two',
        sidebar: () => <div>Two</div>,
        main: () => <h2>Two</h2>
    }
]

const Sidebar = () => {
    return(
        <>
            <Router>
                <div>
                    <ul>
                        <li>
                            <Link to='/'>Home</Link>
                        </li>
                        <li>
                            <Link to='/one'>One</Link>
                        </li>
                        <li>
                            <Link to='/two'>Two</Link>
                        </li>
                    </ul>

                    <Switch>
                        {routes.map((route, index) => (
                            <Route key={index} path={route.path} exact={route.exact} children={<route.sidebar />} />
                        ))}
                    </Switch>

                </div>
            </Router>
        </>
    )
}

export default Sidebar
ReactDOM.render(<Sidebar />, document.getElementById('example'))