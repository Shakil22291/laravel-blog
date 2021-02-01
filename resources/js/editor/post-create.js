import EditorJs from "@editorjs/editorjs";
import Header from "@editorjs/header";

function getOldValue() {
    const inputValue = document.getElementById('oldBody').value;
    if (inputValue !== '') {
        return JSON.parse(inputValue);
    }
    return {};
}

const editor = new EditorJs({
    holder: "editorjs",
    tools: {
        header: {
            class: Header,
            inlineToolbar: true,
            config: {
                placeholder: "Enter a header",
                levels: [1, 2, 3, 4],
                defaultLevel: 1,
            },
        },
    },
    placeholder: 'Write your masterpiece',
    data: getOldValue()
});

const saveButton = document.querySelector("#saveButton");
const faceInput = document.querySelector("#faceInput");

function saveEditor() {
    editor
        .save()
        .then((outputData) => {
            faceInput.value = JSON.stringify(outputData);
        })
        .catch((error) => {
            alert('error');
            console.log(error);
        });
}

saveButton.addEventListener("click", saveEditor);
