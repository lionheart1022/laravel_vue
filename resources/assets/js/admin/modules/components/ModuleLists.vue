<template>
    <div class="component-wrap">

        <!-- description -->
        <v-card class="pt-3">
            <v-layout row wrap>
                <v-flex xs12 sm12 class="px-2">
                    <h1>Contacts</h1>
                    <div class="heading-elements help-section">
                            <a href="#"><v-icon>forum</v-icon></i>Help/Tips</a>                                  
                    </div>
                    <p>They say it's not what you know, it's who you know. With that in mind, here is the list of who you need to know. It is a veritable who's who of staffers, vendors, partners, local businesses and more. Use the search box to find who you need or, for advanced searches, you can find and filter folks by all manner of classifications.</p>
                </v-flex>
            </v-layout>
        </v-card>
        <!-- /description -->
        <v-flex xs12 sm12 dark class="px-2" style="display:flex">
            <span style="padding-top: 20px">Search:&nbsp;&nbsp;</span>
            <v-text-field
                v-model="search"
                append-icon="search"
                single-line
                hide-details
                color="grey"
                style="max-width:250px;"
            ></v-text-field>
            <v-spacer></v-spacer>
            <v-btn slot="activator" outline color="grey" class="mb-2">+ADD NEW</v-btn>
        </v-flex>
        <!-- data table -->
        <v-data-table
                v-bind:headers="headers"
                :pagination.sync="pagination"
                :items="items"
                :search="search"
                v-model="selected"
                item-key="photo"
                class="elevation-1"
                select-all

                >
            <template slot="headerCell" slot-scope="props">
                <span v-if="props.header.value=='action'"></span>
                <span v-else>{{ props.header.text }}</span>
            </template>
            <template slot="items" slot-scope="props">
                <td>
                    <v-checkbox
                        v-model="props.selected"
                        primary
                        hide-details
                    ></v-checkbox>
                </td>
                <td>
                    <v-avatar size="36px">
                        <img :src="props.item.photo">
                    </v-avatar>
                </td>
                <td>{{ props.item.fname }}</td>
                <td>{{ props.item.lname }}</td>
                <td>{{ props.item.job }}</td>
                <td>{{ props.item.company }}</td>
                <td>{{ props.item.department }}</td>
                <td>{{ props.item.email }}</td>
                <td>
                    <v-chip v-if="props.item.status" color="success" label small>{{props.item.status}}</v-chip>
                </td>
                <td style="display:inherit">
                    <v-btn icon>
                        <v-icon>edit</v-icon>
                    </v-btn>
                    <v-btn icon>
                        <v-icon>visibility</v-icon>
                    </v-btn>
                </td>
            </template>
        </v-data-table>
        <div class="text-xs-center pt-2">
            <v-pagination v-model="pagination.page" :length="pages"></v-pagination>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                search: '',
                pagination: {
                    rowsPerPage: 10
                },
                headers: [
                    { text: '', value: 'avatar', align: 'left', sortable: false },
                    { text: 'First Name', value: 'fname', align: 'left', sortable: true },
                    { text: 'Last Name', value: 'lname', align: 'left', sortable: true },
                    { text: 'Job title', value: 'job', align: 'left', sortable: true },
                    { text: 'Company', value: 'company', align: 'left', sortable: true },
                    { text: 'Department', value: 'department', align: 'left', sortable: true },
                    { text: 'Email', value: 'email', align: 'left', sortable: true },
                    { text: 'Status', value: 'status', align: 'left', sortable: true },
                    { text: 'Action', value: 'action', align: 'left', sortable: false },

                ],
                selected: [],
                items: [
                    {photo: '../img/avtar1.jpg', fname: 'Tammy', lname: 'Amerola', job: 'Business Services Sales Representative', company: 'OrgCentral', department: 'Sales', email: 'test@gmail.com', status:'Active'},
                    {photo: '../img/avtar2.jpg', fname: 'Stephen', lname: 'Brenthaven', job: 'Technical Services Librarian', company: 'OrgCentral', department: 'Technical', email: 'test@gmail.com', status:'Active'},
                    {photo: '../img/avtar3.jpg', fname: 'Chantal', lname: 'Nailor', job: 'Senior Research Office', company: 'OrgCentral', department: 'Research Department', email: 'test@gmail.com', status:'Active'},
                    {photo: '../img/woman_avtar1.jpg', fname: 'Cicely', lname: 'Sigler', job: 'Senior Research Officer', company: 'OrgCentral', department: 'Research Department', email: 'test@gmail.com'},
                    {photo: '../img/avtar4.jpg', fname: 'Coy', lname: 'Wollard', job: 'Customer Service Operator', company: 'OrgCentral', department: 'Customer Service', email: 'test@gmail.com'},
                    {photo: '../img/woman_avtar2.jpg', fname: 'Delma', lname: 'Bonds', job: 'Lead Brand Manager', company: 'OrgCentral', department: 'Management', email: 'test@gmail.com', status:'Active'},
                    {photo: '../img/woman_avtar3.jpg', fname: 'Jackelyn', lname: 'Weible', job: 'Airline Transport Pilot', company: 'OrgCentral', department: 'Transport', email: 'test@gmail.com'},
                    {photo: '../img/avtar5.jpg', fname: 'Kennedy', lname: 'Haley', job: 'Senior Marketing Designer', company: 'OrgCentral', department: 'Marketing', email: 'test@gmail.com'},
                    {photo: '../img/woman_avtar4.jpg', fname: 'Lizzee', lname: 'Goodlow', job: 'Technical Services Librarian', company: 'OrgCentral', department: 'Technical Services', email: 'test@gmail.com', status:'Active'},
                    {photo: '../img/woman_avtar5.jpg', fname: 'Marth', lname: 'Enright', job: 'Traffic Court Referee', company: 'OrgCentral', department: 'Traffic', email: 'test@gmail.com'},
                    {photo: '../img/woman_avtar6.jpg', fname: 'Maxine', lname: 'Woldt', job: 'Business Services Sales Representative', company: 'OrgCentral', department: 'Traffic', email: 'test@gmail.com'},
                ],
            }
        },
        mounted() {
            const self = this;

            self.$store.commit('setBreadcrumbs',[
                {label:'Module',name:'', disabled: false},
                {label:'Contacts',name:'', disabled: true},
            ]);
        },
        computed: {
            pages () {
                if (this.pagination.rowsPerPage == null ||
                this.pagination.totalItems == null
                ) return 0

                return Math.ceil(this.pagination.totalItems / this.pagination.rowsPerPage)
            }
        }

    }
</script>