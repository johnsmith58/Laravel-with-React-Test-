import React, { useEffect, useState } from 'react'
import axios from 'axios'

const Search = (query, pageNumber) => {

    const [loading, setLoading] = useState(true)
    const [error, setError] = useState(false)
    const [datas, setData] = useState([])
    const [hasMore, setHasMore] = useState(false)

    useEffect(() => {
        setData([])
    }, [query])

    useEffect(() => {

        setLoading(true)
        setError(false)

        let cancel
        axios({
            method: 'GET',
            url: `/api/react/student/search`,
            params: {q: query},
            cancelToken: new axios.CancelToken(c => cancel = c)
        }).then(res => {
            setData(prevData => {
                return [...new Set([...prevData, ...res.data.map(b => b.name)])]
            })
            setHasMore(res.data.length > 0)
            setLoading(false)
            console.log(res)
        }).catch(e => {
            if(axios.isCancel(e)) return
            setError(true)
        })
        console.log(`this is query ${query} and this is a page number ${pageNumber}`)
        return () => cancel()
    }, [query, pageNumber])

    return {loading, error, datas, hasMore}
}

export default Search