<template>
  <v-app>
    <v-card>
      <div class= "ml-3 my-2">
        <v-btn @click="newArtist" color="primary">Nieuwe artiest toevoegen</v-btn>
      </div>
      <v-card-title>
        Artiesten
        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="artists"
        item-key="id"
        :search="search"
        class="elevation-1"
      >
        <template v-slot:item="{ item }">
          <tr @click="editArtist(item.id)">
            <td>{{item.name}}</td>
          </tr>
        </template>
      </v-data-table>
    </v-card>
  </v-app>
</template>

<script>
export default {
  props: ["artists"],
  data() {
    return {
      search: "",

      headers: [
        {
          text: "Naam",
          align: "start",
          value: "name"
        }
      ]
    };
  },
  methods: {
    editArtist(id) {
      window.location.href = "editArtist/" + id;
    },
    newArtist(){
        window.location.href = "createArtist";
    }
  }
};
</script>