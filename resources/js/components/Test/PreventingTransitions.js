import React, { useState } from 'react'
import ReactDOM from 'react-dom'
import {
    BrowserRouter as Router,
    Route,
    Switch,
    Link
} from 'react-router-dom'

const PreventingTransitions = () => {
    return(
        <>
            <Router>
                <ul>
                    <li>
                        <Link to='/' >Form</Link>
                    </li>
                    <li>
                        <Link to='/one' >One</Link>
                    </li>
                    <li>
                        <Link to='/two' >Two</Link>
                    </li>
                </ul>

                <Switch>
                    <Route path='/' exact children={ <BlockingForm /> } />
                    <Route path='/one' exact children={ <h3>One</h3> } />
                    <Route path='/two' exact children={ <h3>two</h3> } />
                </Switch>

            </Router>
        </>
    )
}

const BlockingForm = () => {

    let [isBlocking, setIsBlocking] = useState(false)

    return(
        <>
        <div>
            <input value={setIsBlocking} />
        </div>
        </>
    )
}

export default PreventingTransitions
ReactDOM.render(<PreventingTransitions />, document.getElementById('example'))