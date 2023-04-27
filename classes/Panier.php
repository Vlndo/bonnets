<?php
class Panier
{
    protected $content = [];

    public function __construct()
    {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        $this->content = $_SESSION['panier'];
    }

    public function getContent(): array
    {
        return $this->content;
    }

    public function setContent($content): self
    {
        $this->content = $content;
        return $this;
    }

    public function plus(int $id): self
    {
        if (!isset($this->content[$id])) {
            $this->content[$id] = 0;
        }

        $this->content[$id]++;

        $this->save();

        return $this;
    }
    public function moins(int $id): self
    {
        if (isset($this->content[$id])) {
            $this->content[$id]--;

            if ($this->content[$id] <= 0) {
                unset($this->content[$id]);
            }
        }
        $this->save();

        return $this;
    }

    public function delete(int $id): self
    {
        if (isset($this->content[$id])) {
            unset($this->content[$id]);
        }
        $this->save();

        return $this;
    }

    public function empty(): self
    {
        $this->content = [];
        $this->save();

        return $this;
    }

    public function save(): self
    {
        $_SESSION['panier'] = $this->getContent();

        return $this;
    }

    public function handle($getData): bool
    {
        if (isset($getData['id'])) {
            $id = $getData['id'];

            $mode = 'plus';
            if (isset($getData['mode'])) {
                $mode = $getData['mode'];
            }

            switch ($mode) {
                case 'plus':
                    $this->plus($id);
                    break;
                case 'moins':
                    $this->moins($id);
                    break;
                case 'delete-line':
                    $this->delete($id);
                    break;
            }

            return true;
        }

        if (isset($getData['mode']) && $getData['mode'] == 'empty') {
            $this->empty();
            return true;
        }
        return false;
    }
}
?>