<template>
	<ul>
		<li v-for="(item, index) in branches"
			:key="index">
			{{item.name}}
		</li>
	</ul>
</template>