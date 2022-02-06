const input = document.getElementById("articleId");
const form = document.getElementById("articleForm");
const errorSpan = document.getElementById("span");

function initHandlers() {
  form.onsubmit = handleSubmit;
}

function setError(message) {
  errorSpan.innerHTML = message;
}

async function handleSubmit(e) {
  e.preventDefault();
  const articleId = input.value;
  const validationResult = validateInput(articleId);

  if (validationResult !== null) {
    return (errorSpan.innerHTML = validationResult);
  }
  try {
    const articleResponse = await fetchArticle(articleId);
    switch (articleResponse.statusCode) {
      case 404:
        setError(`Could not find article with id: ${articleId}`);
        break;
      case 200:
        errorSpan.innerHTML = "we found it";
    }
  } catch (error) {
    errorSpan.innerHTML = "some random error";
  }
}

function clearError() {
  errorSpan.innerHTML = "";
}

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
    if (/^[0-9]+$/.test(value)) return true;
  },
  valueShorterThan: function (value, limit) {
    return value.length < limit;
  },
  valueLongerThan: function (value, limit) {
    return value.length > limit;
  },
};
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

window.onload = initHandlers();
