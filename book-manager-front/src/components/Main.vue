<template>
  <main>
    <MainHeader />
    <MainBooksActions />
  </main>
</template>

<script>
import MainHeader from "@/components/MainHeader";
import MainBooksActions from "@/components/MainBooksActions";

export default {
  name: "Main",
  components: {
    MainHeader,
    MainBooksActions
  }
};
</script>
