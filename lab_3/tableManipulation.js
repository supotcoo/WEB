const table = document.createElement("table");
let lineNumber=0;

const createNewTable = () => {
    document.getElementById('table') != null ? alert("Таблица уже была создана") : 
        table.innerHTML = "<div><table>\n" +
            "<tr>\n" +
            "      <th>\n" +
            (++lineNumber)+
            "      </td>\n" +
            "     </td>\n" +
            "      <td>\n" +
            "      </td>\n" +
            "</tr>"
            "              </table></div>";

        table.setAttribute('id','table')
        document.body.append(table);
}

const addLineToTable = () => {
    let tab = table.insertRow();
    tab.insertCell().append(++lineNumber);
    tab.insertCell().append("");
}
const deleteLine = () => {
    if (document.getElementById('number').value=="") {
        alert("Повторите ввод ");
        return null;
    }
    const num = document.getElementById('number').value;
    try {
        table.deleteRow(num);
    }catch (err){
        alert("Такой строки не существует")
    }

}