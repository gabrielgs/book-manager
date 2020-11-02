<template>
  <main>
    <MainHeader />
    <MainBooksActions />
    <DataTable />
  </main>
</template>

<script>
import MainHeader from "@/components/MainHeader";
import MainBooksActions from "@/components/MainBooksActions";
import DataTable from "@/components/DataTable";

export default {
  name: "Main",
  components: {
    MainHeader,
    MainBooksActions,
    DataTable
  }
};
</script>
