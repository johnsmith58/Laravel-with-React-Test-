import React, { useState, useRef, useCallback } from 'react'
import axios from 'axios'
import Search from '../Student/Search'
import { Spinner } from 'react-bootstrap'
import ReactDOM from 'react-dom'


const Test = () => {

    const [query, setQuery] = useState('')
    const [pageNumber, setPageNumber] = useState(1)

    const { datas, hasMore, loading, error } = Search(query, pageNumber)

    const observer = useRef()
    const lastDataElementRef = useCallback(node => {
        console.log(node)
        if(loading) return
        if(observer.current) observer.current.disconnect()
        observer.current = new IntersectionObserver(entries => {
            if(entries[0].isIntersecting && hasMore){
                console.log('ase')
                setPageNumber(prevPageNumber => prevPageNumber + 1)
            }
        })
        if(node) observer.current.observer(node)
    }, [loading, hasMore])

    function handleSearch(e){
        setQuery(e.target.value)
        setPageNumber(1)
    }

    return (
        <>
            <input type="text" value={query} onChange={handleSearch} />
            {datas.map((data, index) => {
                if(data.index === index +1){
                    return <div ref={lastDataElementRef} key={data} > {data} </div>
                }else{
                    return <div key={data} key={data} > {data} </div>
                }
            })}
            <div>{loading && <Spinner animation="border" />}</div>
            <div> { error && 'Error.....' } </div>
        </>
    )
}

export default Test
ReactDOM.render(<Test />, document.getElementById('example'))