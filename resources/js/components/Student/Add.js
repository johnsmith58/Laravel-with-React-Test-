import React, { createRef, useRef } from "react";
import { Form, Button, Card } from "react-bootstrap";
import axios from "axios";
import { useImage } from "react-image";

function ProfileImage(src) {
    let srcList = "";
    if (!src.src) {
        srcList =
            "https://appdata.chatwork.com/uploadfile/144755/144755842/26d1cdfe12f40385fadcb28c0036ae91.dat?response-content-type=image%2Fjpeg&response-content-disposition=inline&Expires=1592382789&Signature=h54ep-o6OPpG4Z4k2dUDW56VuxiS0RsNyFN0gXjntRk2VlQguKGPtmVQ6uRMyj7CKlV~iB8rZAoj3k6d0TECwiDvaBlxWOfk6DOrS-yonWeciAOHkanB8~COsu5x~mrVRlAlmQiuTSryePLJum7WsHqAR~~KAYZGG91PfaOwkwswBqyFNUVOVW24b8WZVZfKxsHHm8BDkTje3XIe0ZD-5d4iu9D-9f4VFf2-NCsnChTy3gR4GLxdYG3cj4pRhJhUOiLkKAhgVTBvlrnerKDMFYs-kUEUT~orNHfIOECtIItgQV1D-4MOTrRS1HCdYwQ7StI-w~kgvNyZK4QULfiGNw__&Key-Pair-Id=APKAIZEFQUITKUSISS7A";
    } else {
        srcList = src.src;
    }
    return (
        <Card>
            <Card.Img variant="top" src={srcList} />
        </Card>
    );
}

class AddForm extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            name: "",
            email: "",
            image: "",
            imageName: "",
            imagePreviewUrl: "",
            errors: []
        };
        this.handleNameChange = this.handleNameChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
        this.createImage = this.createImage.bind(this);
        this.onImageChange = this.onImageChange.bind(this);
    }

    handleNameChange(e) {
        this.setState({
            [e.target.name]: e.target.value
        });
    }

    handleSubmit(e) {
        e.preventDefault();
        console.log(this.state);

        const student = {
            name: this.state.name,
            email: this.state.email,
            image: this.state.image,
            imageName: this.state.imageName
        };

        const formData = new FormData();
        formData.append("name", this.state.name);
        formData.append("email", this.state.email);
        formData.append("imageName", this.state.imageName);
        formData.append("image", this.state.image, this.state.imageName);

        axios
            .post("/api/react/student/save", formData)
            .then(response => {
                this.props.history.push("/studentlist");
            })
            .catch(error => {
                this.setState({
                    errors: error.response.data.errors
                });
            });
    }

    hasErrorFor(field) {
        return !!this.state.errors[field];
    }

    renderErrorFor(field) {
        if (this.hasErrorFor(field)) {
            return (
                <span className="invalid-feedback">
                    <strong>{this.state.errors[field][0]}</strong>
                </span>
            );
        }
    }

    onImageChange(e) {
        let files = e.target.files;
        if (!files.length) return;
        this.setState({
            image: files[0],
            imageName: files[0]["name"]
        });
        console.log(this.state);
        this.createImage(files[0]);
    }

    createImage(file) {
        let reader = new FileReader();
        reader.onload = e => {
            this.setState({
                imagePreviewUrl: reader.result
            });
        };
        reader.readAsDataURL(file);
    }

    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className="col-sm">
                        <h2>Student Add</h2>
                        <Form
                            onSubmit={this.handleSubmit.bind(this)}
                            encType="multipart/form-data"
                        >
                            <Form.Group controlId="formBasicImage">
                                <ProfileImage
                                    src={this.state.imagePreviewUrl}
                                />
                                <Form.Label>Image</Form.Label>
                                <Form.Control
                                    type="file"
                                    name="image"
                                    placeholder="Choose Image"
                                    onChange={this.onImageChange}
                                />
                            </Form.Group>
                            <Form.Group controlId="formBasicName">
                                <Form.Label>Name</Form.Label>
                                <Form.Control
                                    type="text"
                                    name="name"
                                    placeholder="Enter Name"
                                    onChange={this.handleNameChange}
                                    value={this.state.name}
                                    className={`${
                                        this.hasErrorFor("name")
                                            ? "is-invalid"
                                            : ""
                                    }`}
                                />
                                {this.renderErrorFor("name")}
                            </Form.Group>
                            <Form.Group controlId="formBasicEmail">
                                <Form.Label>Email address</Form.Label>
                                <Form.Control
                                    type="email"
                                    name="email"
                                    onChange={this.handleNameChange}
                                    placeholder="Enter email"
                                    value={this.state.email}
                                    className={`${
                                        this.hasErrorFor("email")
                                            ? "is-invalid"
                                            : ""
                                    }`}
                                />
                                {this.renderErrorFor("email")}
                            </Form.Group>
                            <Button variant="primary" type="submit">
                                Submit
                            </Button>
                        </Form>
                    </div>
                </div>
            </div>
        );
    }
}

export default AddForm;
