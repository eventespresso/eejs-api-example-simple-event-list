(function(){
    'use strict';
    eejs.api.init({collections:['events','datetimes']}).then( function(){
        eejs.api.components.datetime.template = eejs.data.templates.datetime;
        eejs.api.components.event.template = eejs.data.templates.event;
        var EventList = eejs.vue.extend(eejs.api.components.events),
            EventsView = new EventList({
               el: '#app'
            });
    }).catch( function(e){
        console.log(e);
    });
})();