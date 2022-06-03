document.addEventListener("DOMContentLoaded", () => {
fetch(`http://ct.test/`).then
    (data => {
        return data.json()
    }).then(json => console.log(json))
})

const getCargarResultados = (data) => {
    console.log(data)
}