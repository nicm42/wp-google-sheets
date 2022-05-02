const getArray = (col) => {
  // Pull out the first element into a separate variable
  const thisHeader = params[col].shift();

  // And remove any blank elements from array
  const thisArr = params[col];

  return [thisHeader, thisArr];
};

const addElement = (elementType, content, className, appendTo) => {
  const newElement = document.createElement(elementType);
  const newContent = document.createTextNode(content);
  newElement.appendChild(newContent);
  newElement.classList.add(className);
  appendTo.append(newElement);
};

for (let i = 0; i < params.length; i++) {
  const [header, array] = getArray(i);

  // Now add this data to the post
  const post = document.querySelector('.post');
  addElement('p', `${header}: `, `message`, post);
  const message = document.querySelectorAll('.message')[i];
  addElement('span', array.length, 'bold', message);
}
