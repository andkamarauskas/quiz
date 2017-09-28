public function store(Request $request)
    {

        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'question' => 'required',
            'images.0' => 'required|mimes:jpeg,jpg|image|max:1000',
            'images.1' => 'required|mimes:jpeg,jpg|image|max:1000'
        ]);
        if($request->hasFile('images'))
        {
            $error_messages = array();
            foreach ($request->images as $image) {
                // Ignore array member if it's not an UploadedFile object, just to be extra safe
                if (!is_a($image, 'Symfony\Component\HttpFoundation\File\UploadedFile')) {
                    continue;
                }
                $validator = Validator::make(
                    array('file' => $image),
                    array('file' => 'required|mimes:jpeg,jpg|image|max:1000')
                );

                if ($validator->passes()) {
                    echo "works";
                } else {
                    return $error_messages[] = 'Image "' . $image->getClientOriginalName() . '":' . $validator->messages()->first('file');
                }

            }
        }