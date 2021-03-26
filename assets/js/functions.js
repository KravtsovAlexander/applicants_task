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
    if (event.target.classList.contains("table__th--down")) {
      event.target.classList.remove("table__th--down");
      event.target.classList.add("table__th--up");
    } else if (event.target.classList.contains("table__th--up")) {
      event.target.classList.remove("table__th--up");
      event.target.classList.add("table__th--down");
    }
  } else {
    for (let tempElem of tempArr) {
      elemArr.forEach((elem) => {
        if (elem.innerText === tempElem) tBody.append(elem.parentElement);
      });
    }
    event.target.parentElement.querySelectorAll("th").forEach((th) => {
      th.classList.remove("table__th--up");
      th.classList.remove("table__th--down");
    });
    event.target.classList.add("table__th--down");
  }
}

export { mapTable, sortTable };
