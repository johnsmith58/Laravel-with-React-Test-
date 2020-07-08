import ReactDOM from 'react-dom'
import axios from 'axios'
import React, { Component, useState } from 'react'
import { BrowserRouter, Router,Route,  Link, Switch } from 'react-router-dom'
import List from './Student/List'
import AddForm from './Student/Add'
import Detail from './Student/Detail'
import Test from './Student/Test'
import { Form, FormControl, Nav, Navbar, Button  } from 'react-bootstrap'

import Example from './Test/1'
    

class App extends Component{

    constructor(props){
        super(props)
        this.state = {
            search: '',
            newData: []
        }
    }

    SearhStudent(e){
        const [search, setSearch] = useState('')
        e.preventDefault();
        const data = {
            search: this.state.search
        }
        axios.post(`/api/react/student/search/${data.search}`)
        .then(response => {
            this.setState({
                newData: response.data
            })
            setSearch(response.data)
            // this.props.SearchStudent(response.data)
        }).catch(error => {
            console.log(error)
        })
    }

    handleNameChange(e){
        this.setState({
            [e.target.name]: e.target.value
        })
    }

    render () {
        // const newData = this.state.students
        return (
        <BrowserRouter>
        <Navbar bg="dark" variant="dark" expand="lg">
            <Navbar.Brand href="#home">Laravel-Student</Navbar.Brand>
            <Navbar.Toggle aria-controls="basic-navbar-nav" />
            <Navbar.Collapse id="basic-navbar-nav">
                <Nav className="mr-auto">
                <Nav.Link href="/studentlist">Student List</Nav.Link>
                <Nav.Link href="/studentadd">Student Add</Nav.Link>
                <Nav.Link href="/const">Const</Nav.Link>
                </Nav>
                <Form inline onSubmit={this.SearhStudent.bind(this)} >
                <FormControl type="text" name="search" placeholder="Search" className="mr-sm-2" value={this.state.search} onChange={this.handleNameChange.bind(this)} />
                <Button variant="outline-success" type="submit">Search</Button>
                </Form>
            </Navbar.Collapse>
        </Navbar>
            <Link to="/test1">Go to back</Link>
            <Switch>
                <Route path="/studentlist"component={List} />
                <Route path="/studentadd" component={AddForm} />
                <Route path="/const" component={Test} />
                {/* <Route path="/:id" component={Detail} /> */}
                <Route path="/test1" component={Example} />
            </Switch>
        </BrowserRouter>
        )
      }
    }



export default App;
ReactDOM.render(<App />, document.getElementById('example'))