<?php

namespace Attus\JsonApi;

/**
 * A JSON:API-Entity
 * 
 * @author Attila Németh, UBG
 * @date 24.08.2020
 */
class Entity {
  
  // Entity ID
  private         $_id;
  
  // Entity Type
  private         $_type;
  
  // Entity Attributes
  private         $_attributes              = [];
  
  // Entity Relationships
  private         $_relationships           = [];
  
  // Entity Links
  private         $_links                   = [];
  
  /**
   * Set Entity ID
   * @param string $id
   */
  public function setId(string $id): void
  {
    $this->_id = $id;
  }
  
  /**
   * Set Entity Type
   * @param string $type
   */
  public function setType(string $type): void
  {
    $this->_type = $type;
  }
  
  /**
   * Add an Entity Attribute
   * @param string $name
   * @param type $value
   */
  public function setAttribute(string $name, $value): void
  {
    $this->_attributes[$name] = $value;
  }
  
  /**
   * Ann an Entity Relationship
   * @param string $name
   * @param array $data
   */
  public function setRelationship(string $name, array $data): void
  {
    $this->_relationships[$name] = [
      'data' => $data,
    ];
  }
  
  /**
   * Entity Data
   * @return array
   */
  public function getData(): array
  {
    $data = [];
    if (!empty($this->_id)) {
      $data['id'] = $this->_id;
    }
    if (!empty($this->_type)) {
      $data['type'] = $this->_type;
    }
    if (count($this->_attributes)) {
      $data['attributes'] = $this->_attributes;
    }
    if (count($this->_relationships)) {
      $data['relationships'] = $this->_relationships;
    }
    if (count($this->_links)) {
      $data['links'] = $this->_links;
    }
    return $data;
  }
  
  /**
   * Entity Link
   * @param string|array $path
   *  Link path 
   * @param string type $href
   *  Link href value
   */
  public function setLink($path, string $href): void
  {
    if (!is_array($path)) {
      $path = [$path];
    }
    $link = $href;
    while ($next = array_pop($path)) {
      $href = [
        $next => $href,
      ];
    }
    $this->_links += $href;
  }
  
}
