(function(){
    'use strict';
    eejs.api.init({collections:['events','datetimes']}).then( function(){
        eejs.api.components.datetime.template = eejs.data.templates.datetime;
        eejs.api.components.event.template = eejs.data.templates.event;
        eejs.api.events = eejs.vue.extend(eejs.api.components.events);
        eejs.api.eventsView = new eejs.api.events({
            el: '#app',
            components: {
                'event': eejs.api.components.event
            }
        });
    }).catch( function(e){
        console.log(e);
    });
})();