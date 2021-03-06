<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Requests/Messages/UseItemPotionMessage.proto.php');

namespace POGOProtos\Networking\Requests\Messages {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufMessage;

  require('POGOProtos/Inventory/Item/ItemId.proto.php');

  // message POGOProtos.Networking.Requests.Messages.UseItemPotionMessage
  final class UseItemPotionMessage extends ProtobufMessage {

    private $_unknown;
    private $itemId = ItemId::ITEM_UNKNOWN; // optional .POGOProtos.Inventory.Item.ItemId item_id = 1
    private $pokemonId = 0; // optional uint64 pokemon_id = 2

    public function __construct($in = null, &$limit = PHP_INT_MAX) {
      parent::__construct($in, $limit);
    }

    public function read($fp, &$limit = PHP_INT_MAX) {
      $fp = ProtobufIO::toStream($fp, $limit);
      while(!feof($fp) && $limit > 0) {
        $tag = Protobuf::read_varint($fp, $limit);
        if ($tag === false) break;
        $wire  = $tag & 0x07;
        $field = $tag >> 3;
        switch($field) {
          case 1: // optional .POGOProtos.Inventory.Item.ItemId item_id = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->itemId = $tmp;

            break;
          case 2: // optional uint64 pokemon_id = 2
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_UINT64 || $tmp > Protobuf::MAX_UINT64) throw new \Exception('uint64 out of range');$this->pokemonId = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->itemId !== ItemId::ITEM_UNKNOWN) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->itemId);
      }
      if ($this->pokemonId !== 0) {
        fwrite($fp, "\x10", 1);
        Protobuf::write_varint($fp, $this->pokemonId);
      }
    }

    public function size() {
      $size = 0;
      if ($this->itemId !== ItemId::ITEM_UNKNOWN) {
        $size += 1 + Protobuf::size_varint($this->itemId);
      }
      if ($this->pokemonId !== 0) {
        $size += 1 + Protobuf::size_varint($this->pokemonId);
      }
      return $size;
    }

    public function clearItemId() { $this->itemId = ItemId::ITEM_UNKNOWN; }
    public function getItemId() { return $this->itemId;}
    public function setItemId($value) { $this->itemId = $value; }

    public function clearPokemonId() { $this->pokemonId = 0; }
    public function getPokemonId() { return $this->pokemonId;}
    public function setPokemonId($value) { $this->pokemonId = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('item_id', $this->itemId, ItemId::ITEM_UNKNOWN)
           . Protobuf::toString('pokemon_id', $this->pokemonId, 0);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Requests.Messages.UseItemPotionMessage)
  }

}