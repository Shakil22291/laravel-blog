import EditorJs from "@editorjs/editorjs";
import Header from "@editorjs/header";

function getOldValue() {
    const oldValue = JSON.parse(document.getElementById('oldBody').value);
    console.log(oldValue);
    return oldValue
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
    data: getOldValue(),
    placeholder: "Write Your masterpiece"
});

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

const saveButton = document.querySelector("#saveButton");
const faceInput = document.querySelector("#faceInput");

saveButton.addEventListener("click", saveEditor);
