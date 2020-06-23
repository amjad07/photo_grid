// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class photoGridChild extends Component {

  static slug = 'gary_photo_grid_child';

  render() {

    return (
      <div className = {'grid_card'}>
        <a href={this.props.url_links}>
          <h3>{this.props.title}</h3>
        </a>
        <p>{this.props.description}</p>
      </div>
    );
  }
}

export default photoGridChild;
