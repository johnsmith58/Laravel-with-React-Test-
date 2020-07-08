import React, { Component } from 'react'
import axios from 'axios'
import { Form, Button } from 'react-bootstrap'

class Detail extends Component{

    constructor(props){
        super(props)
        this.state = {
            student: {}
        }
    }

    componentDidMount(){
        const studentId = this.props.match.params.id

        axios.get(`/api/react/student/detail/${studentId}`).then(response => {
            this.setState({
                student : response.data
            })

            console.log(this.state.student)
        }).catch(error => {
            console.log(error)
        })

        console.log(studentId)
    }

    render () {
        const student = this.state.student
        return (
            <div className="container">
                <div className="row">
                    <div className="col-sm">
                        <h2>Student Detail</h2>
                        <Form.Group controlId="formBasicEmail">
                            <Form.Label>Name</Form.Label>
                            <Form.Control type="text" name="name" placeholder="Enter Name" value={student.name} />
                        </Form.Group>
                        <Form.Group controlId="formBasicEmail">
                            <Form.Label>Email address</Form.Label>
                            <Form.Control type="email" name="email" placeholder="Enter email"  value={student.email}/>
                        </Form.Group>
                    </div>
                </div>
            </div>
        )
      }
    }



export default Detail
