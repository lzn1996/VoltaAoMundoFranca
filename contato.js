const form = document.querySelector("form");
let contactList = [];

if (localStorage.getItem("contactList")) {
  contactList = JSON.parse(localStorage.getItem("contactList"));
}

form.addEventListener("submit", (e) => {
  const name = e.target.elements.nome.value;
  const email = e.target.elements.email.value;

  contactList.push({ name, email });

  localStorage.setItem("contactList", JSON.stringify(contactList));
});

const contactTableBody = document.querySelector("#contactTableBody");

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
