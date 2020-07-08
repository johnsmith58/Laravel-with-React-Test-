import React from 'react'
import ReactDOM from 'react-dom'
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    useRouteMatch,
    useParams
} from 'react-router-dom'

const NestingExample = () => {
    return (
        <Router>
            <div>
                <ul>
                    <li>
                        <Link to='/'>Home</Link>
                    </li>
                    <li>
                        <Link to='/topics'>Topics</Link>
                    </li>
                </ul>
                <hr />
                <Switch>
                    <Route exact path="/">
                        <Home />
                    </Route>
                    <Route path="/topics">
                        <Topics />
                    </Route>
                </Switch>
            </div>
        </Router>
    )
}

const Home = () => {
    return(
        <div>
            <h2>Home</h2>
        </div>
    )
}

const Topics = () => {

    let { path, url } = useRouteMatch()

    return(
        <div>
            <h2>Topics</h2>
            <ul>
                <li>
                    <Link to={`${url}/go-to-shop`}>Go to shop</Link>
                </li>
                <li>
                    <Link to={`${url}/go-to-beach`}>Go to Beach</Link>
                </li>
                <li>
                    <Link to={`${url}/go-to-town`}>Go to town</Link>
                </li>
            </ul>

            <Switch>
                <Route exact path={path}>
                    <h3>please select a topic</h3>
                </Route>
                <Route path={`${path}/:topicId`}>
                    <Topic />
                </Route>
            </Switch>

        </div>
    )
}

const Topic = () => {
    let { topicId } = useParams()
    return (
    <h3>This is a params { topicId }</h3>
    )
}
ReactDOM.render(<NestingExample />, document.getElementById('example'))