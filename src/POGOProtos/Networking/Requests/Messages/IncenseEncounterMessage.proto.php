<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Requests/Messages/IncenseEncounterMessage.proto.php');

namespace POGOProtos\Networking\Requests\Messages {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufMessage;

  // message POGOProtos.Networking.Requests.Messages.IncenseEncounterMessage
  final class IncenseEncounterMessage extends ProtobufMessage {

    private $_unknown;
    private $encounterId = 0; // optional int64 encounter_id = 1
    private $encounterLocation = ""; // optional string encounter_location = 2

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
          case 1: // optional int64 encounter_id = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_signed_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_INT64 || $tmp > Protobuf::MAX_INT64) throw new \Exception('int64 out of range');$this->encounterId = $tmp;

            break;
          case 2: // optional string encounter_location = 2
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->encounterLocation = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->encounterId !== 0) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->encounterId);
      }
      if ($this->encounterLocation !== "") {
        fwrite($fp, "\x12", 1);
        Protobuf::write_varint($fp, strlen($this->encounterLocation));
        fwrite($fp, $this->encounterLocation);
      }
    }

    public function size() {
      $size = 0;
      if ($this->encounterId !== 0) {
        $size += 1 + Protobuf::size_varint($this->encounterId);
      }
      if ($this->encounterLocation !== "") {
        $l = strlen($this->encounterLocation);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearEncounterId() { $this->encounterId = 0; }
    public function getEncounterId() { return $this->encounterId;}
    public function setEncounterId($value) { $this->encounterId = $value; }

    public function clearEncounterLocation() { $this->encounterLocation = ""; }
    public function getEncounterLocation() { return $this->encounterLocation;}
    public function setEncounterLocation($value) { $this->encounterLocation = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('encounter_id', $this->encounterId, 0)
           . Protobuf::toString('encounter_location', $this->encounterLocation, "");
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Requests.Messages.IncenseEncounterMessage)
  }

}