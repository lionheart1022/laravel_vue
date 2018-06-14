<template>
    <div class="component-wrap">

        <!-- description -->
        <v-card class="pa-3">
            <v-layout row wrap class="md-layout">
                <v-flex xs12 sm6 md2 class="px-2">
                    <v-avatar size="140px" class="usr-avatar">
                        <img :src="items.photo" class="usr-img">
                    </v-avatar>
                </v-flex>
                <v-flex xs12 sm6 md10 class="px-12">
                    <h1 class="usr-name">{{items.fname}} {{items.lname}}</h1>
                    <p>{{items.job}}&nbsp;&nbsp;|&nbsp;&nbsp;{{items.company}}&nbsp;&nbsp;|&nbsp;&nbsp;{{items.department}}</p>
                    
                    <p>
                        <v-icon>phone_iphone</v-icon>
                        914.330.214(cell)&nbsp;&nbsp;|&nbsp;&nbsp;914.241.524(home)&nbsp;&nbsp;|&nbsp;&nbsp;212.524.544(work)
                    </p>
                    
                    <p>
                        <v-icon>mail_outline</v-icon>
                        libanto@aol.com
                    </p>
                    
                    <p>
                        <v-icon>cake</v-icon>
                        03.11.2003&nbsp;&nbsp;
                        <v-icon>wc</v-icon>
                        Male&nbsp;&nbsp;
                        <v-icon>location_on</v-icon>
                        White Plains, NY
                    </p>
                    <p>
                        <v-icon>fa-facebook-f</v-icon>
                        &nbsp;&nbsp;&nbsp;
                        <v-icon>fa-twitter</v-icon>
                        &nbsp;&nbsp;&nbsp;
                        <v-icon>fa-dribbble</v-icon>
                    </p>
                </v-flex>  
            </v-layout>
        </v-card>
        <!-- /description -->

        <v-card class="pa-3">
            <v-layout row wrap>
                <v-tabs 
                    slot="extension"
                    v-model="model"
                    centered
                    color="cyan"
                    slider-color="yellow">
                    <v-tab :key="1" :href="`#tab-1`">Profile Detials</v-tab>
                    <v-tab :key="2" :href="`#tab-2`">Groups+Attributes</v-tab>
                    <v-tab :key="3" :href="`#tab-3`">Documents</v-tab>
                    <v-tab :key="4" :href="`#tab-4`">Status+Activity</v-tab>
                </v-tabs>
                <v-divider></v-divider>
                <v-tabs-items v-model="model">
                    <v-tab-item
                        :key="1"
                        :id="`tab-1`"
                    >
                        <v-tabs
                            slot="extension"
                            v-model="submodel"
                            centered
                            color="white"
                            slider-color="cyan"
                        >
                            <v-tab :key="1" :href="`#subtab-1`">coodinates</v-tab>
                            <v-tab :key="2" :href="`#subtab-2`">bios</v-tab>
                            <v-tab :key="3" :href="`#subtab-3`">additional contacts</v-tab>
                            <v-tab :key="4" :href="`#subtab-4`">education</v-tab>
                        </v-tabs>
                    </v-tab-item>
                    <v-tab-item
                        v-for="item in items"
                        :key="item.key"
                        :id="item.id"
                    >
                        <v-card>
                            {{content_need}}
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>
            </v-layout>
        </v-card>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                model: 'tab-1',
                submodel: 'subtab-1',
                search: '',
                items: [
                    {key:2, id:'tab-2'},
                    {key:3, id:'tab-3'},
                    {key:4, id:'tab-4'},
                ],
                content_need: "Content need",
                selected: [],
                items: {photo: '../img/avtar1.jpg', fname: 'Tammy', lname: 'Amerola', job: 'Business Services Sales Representative', company: 'OrgCentral', department: 'Sales', email: 'test@gmail.com', status:'Active'},
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