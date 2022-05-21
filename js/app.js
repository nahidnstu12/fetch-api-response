async function getUsers() {
  let url = "https://gorest.co.in/public/v1/users";
  const options = {
    method: "GET",
    headers: {
      Authorization: `bearer d7c01847de4c083cb154e9a533294301e9f05f93dbae7d589e42ece63226c0a3`,
      "Content-Type": "application/json",
    },
  };
  try {
    let res = await fetch(url,{...options});
    return await res.json();
  } catch (error) {
    console.log(error);
  }
}
getUsers().then((data) => console.log(data.data));
async function renderUsers() {
  let { data } = await getUsers();
  let html = "";
  data.forEach((user) => {
    let htmlSegment = `<div class="user">
                            <h5 class="user-id">ID: ${user.id} <span>Status: ${user.status}</span> </h5>
                            <h3>${user.name} </h3>
                            <h3>${user.email}</h3>
                            <h4>${user.gender}</h4>
                        </div>`;

    html += htmlSegment;
  });

  let container = document.querySelector(".container");
  container.innerHTML = html;
}
renderUsers();
