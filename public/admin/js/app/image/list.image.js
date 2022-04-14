var Image = function() {
	this.title = "Image";
}

$.extend(Image.prototype, {
	addFile: function(file, response, element) {
		var row = '<tr id="img-' + response.id +'">' + this.deleteIcon(response.id)
			+ this.showImage(response.file)
			+ this.positionInput(response.file)
			+ this.showFileName(response.file)
			+ this.showSize(file.size)
			+ this.showWidth(file.width)
			+ this.showHeight(file.height)
			+ '</tr>';
		element.prepend(row);
	},
	delFile: function(id) {
		if (confirm('Are you sure?')) {
			$.get('/admin/picture/' +  id + '/delete', function() {
				$('#img-' + id).remove();
			});
		}
	},
	deleteIcon: function(id) {
		return '<td><div class="btn btn-xs btn-link"><span onClick="new Image().delFile('+id+')" class="fa fa-remove"></span><span class="sr-only">Delete</span></div></td>';
	},
	showImage: function(fileName) {
		return '<td><img width="50" height="30" src="'+ fileName + '"></td>';
	},
	positionInput: function(file) {
		return '';
		// return '<td><input class="form-control input-sm " min="0" type="number" name="position"></td>';
	},
	showFileName: function(fileName) {
		return '<td>' + fileName + '</td>';
	},
	showSize: function(size) {
		return '<td>'+ size +'</td>';
	},
	showWidth: function(width) {
		return '<td>'+ width +'</td>';
	},
	showHeight: function(height) {
		return '<td>' + height + '</td>';
	}
});
