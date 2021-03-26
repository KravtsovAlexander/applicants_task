/**
 * Mark up a table for later sorting
 * @param {HTMLElement} table
 */
function mapTable(table) {
  let ths = table.querySelector("thead").querySelectorAll("th"),
    trs = table.querySelector("tbody").querySelectorAll("tr");

  ths.forEach((th, index) => {
    th.setAttribute("data-th", index);
    trs.forEach((tr) => {
      tr.querySelectorAll("td")[index].setAttribute("data-td", index);
    });
  });
}

/**
 * Sort table by clicking on a relevant <th>
 * @param {Event} event 
 */
function sortTable(event) {
  let tBody = document.querySelector("tbody"),
    trs = tBody.querySelectorAll("tr"),
    thId = event.target.dataset.th,
    tempArr = [],
    elemArr = [];

  trs.forEach((tr) => {
    let tds = tr.querySelectorAll("td");

    tds.forEach((td) => {
      let tdId = td.dataset.td;
      if (tdId === thId) {
        tempArr.push(td.innerText);
        elemArr.push(td);
      }
    });
  });

  tempArr.sort((a, b) => a.localeCompare(b));

  let isSortedAlready = tempArr.every(
    (elem, index) => elem === elemArr[index].innerText
  );

  if (isSortedAlready) {
    for (let tempElem of tempArr.reverse()) {
      elemArr.forEach((elem) => {
        if (elem.innerText === tempElem) tBody.append(elem.parentElement);
      });
    }
  } else {
    for (let tempElem of tempArr) {
      elemArr.forEach((elem) => {
        if (elem.innerText === tempElem) tBody.append(elem.parentElement);
      });
    }
  }
}

export { mapTable, sortTable };
