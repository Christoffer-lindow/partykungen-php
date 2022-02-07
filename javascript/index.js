// DOM elements
let input = document.getElementById("article-id");
let form = document.getElementById("article-form");
let errorSpan = document.getElementById("error-span");
let loader = document.getElementById("loader");
// Page state
let searchedValues = new Set();
let statistics = new Map();

// Validation
function validateInput(value) {
  if (!validator.isNumeric(value)) return "article id needs to be a number";
  if (validator.valueShorterThan(value, 5))
    return "article id needs to be atleast 5 characters long";
  if (validator.valueLongerThan(value, 7))
    return "artcile id cannot be longer than 7 characters";
  return null;
}

const validator = {
  isNumeric: function (value) {
    return /^[0-9]+$/.test(value);
  },
  valueShorterThan: function (value, limit) {
    return value.length < limit;
  },
  valueLongerThan: function (value, limit) {
    return value.length > limit;
  },
};

// Data fetching
async function fetchArticle(articleId) {
  const result = await fetch(
    `http://localhost:8000/article?article_id=${articleId}`,
    {
      mode: "cors",
    }
  );
  const data = await result.json();
  return data;
}

// Handlers
function initHandlers() {
  form.onsubmit = handleSubmit;
}

function handleStatistics(data) {
  if (!statistics.has(data.box.name)) {
    statistics.set(data.box.name, []);
  }
  statistics.get(data.box.name).push(data.article);
}

async function handleSubmit(e) {
  e.preventDefault();
  const articleId = input.value;
  const validationResult = validateInput(articleId);

  if (searchedValues.has(articleId)) {
    return setError("You have already searched this article");
  }

  if (validationResult !== null) {
    return (errorSpan.innerHTML = validationResult);
  }
  try {
    clearError();
    setLoading(true);
    const articleResponse = await fetchArticle(articleId);
    setLoading(false);
    searchedValues.add(articleId);
    switch (articleResponse.statusCode) {
      case 404:
        setError(`Could not find article with id: ${articleId}`);
        break;
      case 200:
        handleSuccess(articleResponse.data);
        input.value = "";
        break;
    }
  } catch (error) {
    errorSpan.innerHTML = error;
  }
}

function handleSuccess(data) {
  for (let i = 0; i < data.length; i++) {
    handleStatistics(data[i]);
    updateStatisticsDom();
  }
  clearError();
}

// DOM manipulations
function setError(message) {
  errorSpan.innerHTML = message;
}
function clearError() {
  errorSpan.innerHTML = "";
}
function updateStatisticsDom() {
  const statisticsElement = document.getElementById("statistics");
  statistics.forEach((val, key) => {
    let currentElement = document.getElementById(`statistics-${key}`);
    if (currentElement === null) {
      currentElement = document.createElement("p");
      currentElement.setAttribute("id", `statistics-${key}`);
    }
    const count = val.length;
    const itemText = count === 1 ? "item" : "items";
    currentElement.textContent = `${count} ${itemText} in ${key} Box`;
    statisticsElement.appendChild(currentElement);
    let namesElement = document.getElementById(`namesElement-${key}`);
    if (namesElement === null) {
      namesElement = document.createElement("p");
      namesElement.setAttribute("id", `namesElement-${key}`);
    }
    currentElement.classList.add("border-2");
    currentElement.classList.add("border-sky-300");
    currentElement.classList.add("mb-4");
    currentElement.classList.add("p-4");
    const text = `[${val.map((article) => article.name).toString()}]`;
    namesElement.textContent = text;
    currentElement.appendChild(namesElement);
  });
}
function createListObject(name) {
  let listElement = document.getElementById(name);
  if (listElement === null) {
    listElement = document.createElement("LI");
    listElement.setAttribute("id", name);
    const listText = document.createTextNode(name);
    listElement.appendChild(listText);
    list.appendChild(listElement);
  }
}
function addChildToListObject(id, article) {
  let listElement = document.getElementById(id);
  const jsonStr = JSON.stringify(article, null, 0);
  const preElement = document.createElement("pre");
  preElement.textContent = jsonStr;
  listElement.appendChild(preElement);
}
function setLoading(loading) {
  if (loading) {
    loader.innerHTML = "Loading";
  } else {
    loader.innerHTML = "";
  }
}

function clearStatisticsDom() {
  const statisticsElement = document.getElementById("statistics");
  statisticsElement.innerHTML = "";
}

function resetState() {
  searchedValues = new Set();
  statistics = new Map();
  clearStatisticsDom();
}
window.onload = initHandlers();
