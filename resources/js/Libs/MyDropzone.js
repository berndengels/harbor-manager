import { Dropzone } from "dropzone";

class MyDropzone {
	create(selector = '#dropzone', paramName = 'image', uploadURL = "/admin/upload/image", formID = "") {
		Dropzone.autoDiscover = false;

		const dropzone = new Dropzone(selector, {
					url: uploadURL,
					paramName: paramName,
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					maxFilesize: 10,
					parallelUploads: 1,
					maxFiles: 1,
					method: 'post',
					acceptedFiles: 'image/*',
					addRemoveLinks: true,
					dictRemoveFile: 'Datei löschen',
					dictCancelUpload: 'Hochladen abbrechen',
					dictDefaultMessage: 'Bildatei hier reinziehen',
				})
//				.on('complete', file => this.removeFile(file))
				.on('addedfile', file => console.info('file', file));
		return dropzone;
	}
}

export default MyDropzone;
