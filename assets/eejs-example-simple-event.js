(function(){
    'use strict';
    eejs.api.init({collections:['events']}).then(function(){
        var Event = eejs.vue.extend(eejs.api.components.event),
            //uniqId = eejs.utils.getUniqueId(),
            EventPreview = Event.extend({
                template: eejs.data.templates.single_event_preview,
                // id : uniqId
                id : eejs.data.event_id
            }),
            EventForm = Event.extend({
                template: eejs.data.templates.single_event_form,
                // id : uniqId
                id : eejs.data.event_id
            });

       var eventView = new eejs.vue({
           el: '#app',
           'components' : {
               'eventForm' : EventForm,
               'eventPreview' : EventPreview
           }
       });
    }).catch(function(e){
        console.log(e);
    });
})();