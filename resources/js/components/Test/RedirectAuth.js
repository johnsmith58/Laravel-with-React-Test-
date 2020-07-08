import React from 'react'
import ReactDOM from 'react-dom'
import {
    BrowserRouter as Router,
    Route,
    Switch,
    Link,
    useHistory,
    Redirect
} from 'react-router-dom'

const RedirectAuth = () => {
    return(
        <Router>
            <div>
                <AuthButton />
                <ul>
                    <li>
                        <Link to='/public' >Public page</Link>
                    </li>
                    <li>
                        <Link to='/protected' >Protected page</Link>
                    </li>
                </ul>
                <Switch>
                    <Route path='/public'>
                        <PublicPage />
                    </Route>
                    <PrivateRoute path='/protected'>
                        <ProtectedPage />
                    </PrivateRoute>
                </Switch>
            </div>
        </Router>
    )
}

const fakeAuth = {
    isAuthenticated : true,
    authenticate(cb){
        fakeAuth.isAuthenticated = true;
        setTimeout(cb, 100)
    },
    signOut(cb){
        fakeAuth.isAuthenticated = false;
        setTimeout(cb, 100);
    }
}

const AuthButton = () => {
    let history = useHistory()

    return fakeAuth.isAuthenticated ? (
        <p>
            Welcome! {''}
            <button
            onClick={() => {[
                fakeAuth.signOut(() => history.push('/'))
            ]}}>
                Sign Out
            </button>
        </p>
    ): (
        <p>Your not logged in...
        <button
        onClick={() => {[
            fakeAuth.authenticate(() => history.push('/'))
        ]}}>
            Sign in
        </button></p>
    )

}

const PrivateRoute = ({children, ...rest}) => {
    return (
        <>
            <div>
                <Route
                {...rest}
                render={({location}) => 
                    fakeAuth.isAuthenticated ? (
                        children
                    ) : (
                        <Redirect
                            to={{
                                pathname : '/login',
                                state: {from: location}
                            }}
                        />
                    )
                }
                />
            </div>
        </>
    )
}

const PublicPage = () => {
    return (
        <h2>Public page</h2>
    )
}

const ProtectedPage = () => {
    return(
        <h3>Protected page</h3>
    )
}

export default RedirectAuth
ReactDOM.render(<RedirectAuth />, document.getElementById('example'))