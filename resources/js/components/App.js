import React from "react";
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";
import Detail from './Detail'
import Edit from './Edit'

function ParamsExample() {
  return (
    <Router>
      <div>
        <h2>Accounts</h2>
        <ul>
          <li>
            <Link to="/detail/netflix">Detail - Netflix</Link>
            <Link to="/edit/netflix">Edit - Netflix</Link>
          </li>
          <li>
            <Link to="/detail/suzuki">Detail - Zillow Group</Link>
            <Link to="/edit/suzuki">Edit - Zillow Group</Link>
          </li>
          <li>
            <Link to="/detail/yahoo">Detail - Yahoo</Link>
            <Link to="/edit/yahoo">Edit - Yahoo</Link>
          </li>
          <li>
            <Link to="/detail/modus-create">Detail - Modus Create</Link>
            <Link to="/edit/yahoo">Edit - Modus Create</Link>
          </li>
        </ul>

        <Switch>
        <Route path="/detail/:id" component={Detail} />
        <Route path="/edit/:id" component={Edit} />
        </Switch>


      </div>
    </Router>
  );
}

export default ParamsExample;
