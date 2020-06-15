import {extend} from 'flarum/extend';
import Dropdown from 'flarum/components/Dropdown';

app.initializers.add('remove-image-markdown-toolbar', () => {
    extend(Dropdown.prototype, 'getMenu', function(items) {
        const user = app.session.user;
        items.children.forEach((item, i) => {
          if(item.attrs.className == 'item-delete') {
            if(user.data.id == 1 || user.data.id == 5 || user.data.id == 6 || user.data.id == 7) {
              item.attrs.className = 'item-delete reveal'
            }
          }
        });

    });
}, -100);
