import "./bootstrap";

import Dropzone from "dropzone";
Dropzone.autoDiscover = false;

if (document.querySelector("#dropzone")) {
    const myDropzone = new Dropzone("#dropzone", {
        paramName: "file",
        dictDefaultMessage: "Sube tu imagen",
        acceptedFiles: ".png,.jpg,.jpge,.gif",
        addRemoveLinks: true,
        dictRemoveFile: "Borrar Archivo",
        maxFiles: 1,
        uploadMultiple: false,

        init: function () {

            if (document.querySelector('[name="imagen"]').value.trim()) {
                const imagenPublicada = {};
                imagenPublicada.size = 1234;
                imagenPublicada.name =
                    document.querySelector('[name="imagen"]').value;

                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(
                    this,
                    imagenPublicada,
                    `/uploads/${imagenPublicada.name}`
                );

                imagenPublicada.previewElement.classList.add(
                    "dz-sucess",
                    "dz-complete"
                );
            }
        },
    });

    //addedfile

    myDropzone.on("sending", (file, xhr, formData) => {
        // console.log(file);
        // console.log(`File added: ${file.name}`);
    });

    myDropzone.on("success", (file, response) => {
        document.querySelector('[name="imagen"').value = response.imagen;
        //console.log(`File added: ${file.name}`)
    });

    myDropzone.on("error", (file, message) => console.log(`${message}`));

    myDropzone.on("removedfile", (file) => {
        document.querySelector('[name="imagen"').value = "";
        console.log(`Archivo eliminado :  ${file.name}`);
    });
}
