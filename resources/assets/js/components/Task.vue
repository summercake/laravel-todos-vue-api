<template>
	<tr>
		<td scope="row">
			{{ task.id }}
		</td>
		<td>
			{{ task.title }}
		</td>
		<td>
			{{ task.priority }}
		</td>
		<td>
			<button @click="removeTask" class="btn btn-sm btn-danger">Remove</button>
		</td>
	</tr>
</template>
<script>
	export default {
		data() {
			return {}
		},
		props: ['task'],
		methods: {
			removeTask() {
				this.$emit('delete', this.task.id);
			}
		}
	};
</script>
<style scoped>
</style>