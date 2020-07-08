
import axios from 'axios'
import React, { Component, useState, useEffect } from 'react'
import { Link } from 'react-router-dom'
import { Button, Card } from 'react-bootstrap'
import Search from './Search'

const StudentImage = (src) => {

    let defaultSrc = "https://appdata.chatwork.com/uploadfile/144755/144755842/3b3fb915fef4c4e041e921aa4aa6fc29.dat?response-content-type=image%2Fjpeg&response-content-disposition=inline&Expires=1592476350&Signature=dvD9LiSy45l8CTLg6uO5wkNwWwbD0~vEdjn7xc3C7yM7pb46rjB5c3nVEFpzYSU5vYOxQzbCKnMn~njQbE-S76mHOh06z9An97BA7gT0SmiZVnYg3aeWRq-b6KgwcGioQ8r5XG~osVddSR7TbocuEkIjAOwnMnu9iS3T6p9L-OisIrMD7Kmj8WruqkrR26AwOd6RkNV76g8vczQeFFOrEzlC849k9I5dOIRQOQ~TCJ32pDPnOuTo7eHgBQhaWEdcA1k5Dkvgc0aVKXUYgirbK8HA91kAyASA4b-vZa66lTIt2RKnzaH~-NgfPHmUP9zs8fz8hySAGfboH-6OVovmGQ__&Key-Pair-Id=APKAIZEFQUITKUSISS7A"


    // axios.get(`/api/react/student/pfImage/${src.src}`).then(response => {
    //     if(response.status == 200){
    //         this.setState({
    //             pfSrc: response.data
    //         })
    //     }else{
    //         this.setState({
    //             pfSrc: defaultSrc
    //         })
    //     }
    // }).catch(errors => {
    //     console.log(errors)
    // })

    // console.log(pfSrc)

    return (
        <Card.Img variant="top" src={defaultSrc} />
    )

}

const StudentCard = (data) => {
    let student = data.data
    return (
        <Card className="p-2 flex-fill bd-highlight card" style={{ width: '18rem', margin: '0.5rem' }}>
            <StudentImage src={student['pf_image'].src_file_name} />
            <Card.Body>
                <Card.Title>{student.name}</Card.Title>
                <Card.Text>
                This is student email: {student.email}
                </Card.Text>
                <Button variant="primary"><Link className="btn btn-primary stretched-link" key={student.id} to={`/${student.id}`}>View Detail</Link></Button>
            </Card.Body>
        </Card>
    )
}

class List extends Component{

    constructor(props){
        super(props)
        this.state = {
            pfSrc: '',
            students: []
        }
        this.SearchStudent = this.SearchStudent.bind(this)
    }

    useEffect(){
        console.log(search)
    }

    SearchStudent(data){
        console.log(this.props.newData)
    }

    componentDidMount(){
        axios.get('/api/react/student/all').then(response => {
            this.setState({
                students: response.data
            })
        }).catch(errors => {
            console.log(errors)
        })
    }
    render () {
        return (
            <div className="d-flex align-content-stretch flex-wrap">
                {this.state.students.map(student => (
                    <StudentCard data={student} key={student.id} />
                ))}
            </div>
        )
      }
    }

export default List
