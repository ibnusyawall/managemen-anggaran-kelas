<template>
  <footer class="p-4 text-center">
    © {{ new Date().getFullYear() }} — {{ $store.state.brand }}  by
    <a href="https://wa.me/6282299265151">{{ $store.state.author }}</a>
  </footer>
</template>

<script>
export default {
  name: "Footer",
};
</script>

<style>
</style>
