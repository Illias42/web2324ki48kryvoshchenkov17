const button = document.querySelector('.button');
button.addEventListener('click', sendXhr);

function sendXhr() {
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const data = JSON.parse(xhr.response);
      displayData(data);
    } else {
      console.log('Ready state: ', xhr.readyState);
    }
  };

  xhr.open('GET', 'https://jsonplaceholder.typicode.com/users', true);
  xhr.send();
}

function displayData(data) {
  const dataContainer = document.querySelector('#data');

  data.forEach((item) => {
    const newListItem = document.createElement('li');
    newListItem.textContent = item.name;
    dataContainer.appendChild(newListItem);
  });
}
