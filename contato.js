const form = document.querySelector("form");
const contactTableBody = document.querySelector("#contactTableBody");
const clearContacts = document.querySelector("#clearContacts");

let contactList = [];
if (localStorage.getItem("contactList")) {
  contactList = JSON.parse(localStorage.getItem("contactList"));
}

function capitalizeFirstLetters(phrase) {
  if (phrase) {
    return phrase
      .toLocaleLowerCase()
      .split(" ")
      .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
      .join(" ");
  }
}

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const name = capitalizeFirstLetters(e.target.elements.nome.value);
  const email = e.target.elements.email.value;

  if (!name || !email) return;

  contactList.push({ name, email });

  localStorage.setItem("contactList", JSON.stringify(contactList));

  contactTableBody.innerHTML = `
  <tr>
  <td class='text-center' colspan='2'>
  <div class="spinner-border text-center" role="status">
    <span class="sr-only">Carregando...</span>
  </div>
  </td>
  </tr>`;

  setTimeout(() => {
    contactTableBody.innerHTML = "";

    contactList.forEach((contact) => {
      const tr = document.createElement("tr");
      const tdName = document.createElement("td");
      const tdEmail = document.createElement("td");

      tdName.textContent = contact.name;
      tdEmail.textContent = contact.email;

      tr.appendChild(tdName);
      tr.appendChild(tdEmail);

      contactTableBody.appendChild(tr);
    });
  }, 2000);
});
contactTableBody.innerHTML = "";

contactList.forEach((contact) => {
  const tr = document.createElement("tr");
  const tdName = document.createElement("td");
  const tdEmail = document.createElement("td");

  tdName.textContent = contact.name;
  tdEmail.textContent = contact.email;
  tdName.setAttribute("class", "text-truncate");
  tdName.setAttribute("style", "max-width: 100px;");
  tdEmail.setAttribute("class", "text-truncate");

  tr.appendChild(tdName);
  tr.appendChild(tdEmail);

  contactTableBody.appendChild(tr);
});

if (contactList.length === 0) {
  contactTableBody.innerHTML = `
  <tr>
  <td class='text-center' colspan='2'>Nenhum contato salvo até o momento.</td>
  </tr>`;
}
