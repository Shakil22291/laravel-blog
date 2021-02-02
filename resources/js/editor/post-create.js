import EditorJs from "@editorjs/editorjs";
import Header from "@editorjs/header";
import Raw from "@editorjs/raw";
import SimpleImage from "./tools/SimpleImage";

function getOldValue() {
    const faceInput = document.querySelector("#faceInput").value;
    if (faceInput  !== '') {
        return JSON.parse(faceInput);
    }
    return {};
}

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
        raw: Raw,
        image: {
            class: SimpleImage,
            inlineToolbar: true
        }
    },
    placeholder: 'Write your masterpiece',
    data: getOldValue(),
    onChange() {
        console.log('I am changed');
        saveEditor();
    }
});