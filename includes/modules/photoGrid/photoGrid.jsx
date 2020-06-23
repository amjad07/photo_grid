// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class photoGrid extends Component {

  static slug = 'gary_photo_grid';

  static css(props){
    var css = [];



    css.push([{
      selector    :   '%%order_class%% .grid_card',
      declaration :   `padding-top: ${props.shape_slider};`,
    }]);

    css.push([{
      selector    :   '%%order_class%%  .grid_card a',
      declaration :   `margin-top: -${props.shape_slider};`,
    }]);

    css.push([{
      selector    :   '.gary_photo_grid > .et_pb_module_inner',
      declaration :   `grid-row-gap: ${props.gap_slider};`,
    }]);

    css.push([{
      selector    :   '.gary_photo_grid > .et_pb_module_inner',
      declaration :   `grid-column-gap: ${props.gap_slider};`,
    }]);

    css.push([{
      selector    :   '.gary_photo_grid > .et_pb_module_inner',
      declaration :   `grid-template-columns: ${props.template_columns};`,
    }]);

    return css;
  }
  render() {
    return this.props.content;
  }
}

export default photoGrid;
