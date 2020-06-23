// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class photoGrid extends Component {

  static slug = 'gary_photo_grid';

  static css(props){
    var css = [];
    css.push([{
      selector    :   '.grid_card',
      declaration :   `padding-top: ${props.shape_slider};`,
    }]);

    css.push([{
      selector    :   '.grid_card a',
      declaration :   `margin-top: -${props.shape_slider};`,
    }]);

    return css;
  }
  render() {
    return this.props.content;
  }
}

export default photoGrid;
