import React, {Component} from "react";

class Detail extends Component{
    constructor(props){
        super(props)
    }
    render(){
        return(
            <div>Detail page {this.props.match.params.id} </div>
        )
    }
}
export default Detail