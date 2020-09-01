<template>
  <v-app>
    <v-card>
      <div class="ml-3 my-2">
        <v-btn @click="newAlbum" color="primary">Nieuw Album toevoegen</v-btn>
      </div>
      <v-card-title>
        Albums
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
        :items="albums"
        item-key="id"
        :search="search"
        class="elevation-1"
      >
        <template v-slot:item="{ item }">
          <tr @click="viewAlbum(item.id)">
            <td>{{item.title}}</td>
            <td>{{item.artist.name}}</td>
            <td>{{item.genre}}</td>
          </tr>
        </template>
      </v-data-table>
    </v-card>
  </v-app>
</template>

<script>
export default {
  props: ["albums"],
  data() {
    return {
      search: "",

      headers: [
        {
          text: "Titel",
          align: "start",
          value: "title"
        },
        {
          text: "Artiest",
          value: "artist.name"
        },
        {
          text: "Genre",
          value: "genre"
        }
      ]
    };
  },
  methods: {
    viewAlbum(id) {
      window.location.href = "showAlbum/" + id;
    },
    newAlbum() {
      window.location.href = "createAlbum";
    }
  }
};
</script>