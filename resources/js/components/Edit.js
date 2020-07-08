import React, {Component} from "react";

class Edit extends Component{
    constructor(props){
        super(props)
    }
    render(){
        return(
            <div>Edit page {this.props.match.params.id} </div>
        )
    }
}
export default Edit